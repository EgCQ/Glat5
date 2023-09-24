<?php

namespace App\Http\Controllers;
use App\Models\Notices;
use App\Models\comment_notices;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class CommenNoticesController extends Controller
{

    public function getCommentNotice(){
    //     $userId = Auth::id();
    //     $data = comment_notices::where('id_user', $userId)
    //     ->where('id_notice', $id)
    //     ->first();
    // return $data;
        $notice = DB::table('notices')
        ->leftJoin('comment_notices', 'comment_notices.id_notice', '=', 'notices.id')
        ->select('notices.id as notice','comment_notices.message as message','comment_notices.favorite as favorite',
        'comment_notices.id_users as user','comment_notices.id_notice as comment_notice')
        ->groupBy("notice")
        ->get();
        return response()->json([
            'notice' => $notice,
        ]);
    }
    public function commentNotice(){
        $userId = Auth::id();
        $condition = DB::select("select * from comment_notices where id_user = $userId");
        if(count($condition) >= 1){
            return "Ya existe un registro de este usuario";
        } else {
            return "Su comentario se registrara";
        }
        // comment_notices::create([
        //     'id_users' => $userId,
        //     'message' => request('message'),
        //     'id_notice' => request('notices'),
        // ]);
        // return redirect('noticias_gelato');

    }
    public function editCommentNotice($id){
        $userId = Auth::id();
        $comment_notice = comment_notices::where('id_user', $userId)
        ->where('id_notice', $id)
        ->first();
        $comment_notice->update([
            'message' => request('message'),
        ]);
    }
    protected function postCommentNotice($id){
        //$userId = Auth::id();

        $comment_notice = comment_notices::where('id_notice', $id)->first();
        if (empty($comment_notice)) {
            /*$data = */
            comment_notices::create([
                'id_users' => request('user'),
                'message' => request('message'),
                'id_notice' => request('notices'),
            ]);
        } else {
            /*$data = */
            $comment_notice->update([
                'message' => request('message'),
            ]);
        }
        return redirect('noticias_gelato')->with('success','Comentario agregado');

    }

    public function delete($id){
        $comment_notice = comment_notices::find($id);
        $comment_notice->delete();
        return redirect('home')->with('success','Noticia eliminada');

    }

    public function postFavorite($id){
        $userId = Auth::id();
        $comment_notice_favorite = DB::select("select * from comment_notices where id_users = $userId and id_notice = $id");

        $comment_notice = comment_notices::where('id_users', $userId)
        ->where('id_notice', $id)
        ->first();
        if (empty($comment_notice)) {
            /*$data = */
            comment_notices::create([
                'id_users' => $userId,
                'id_notice' => $id,
                'favorite' => 1,

            ]);
        } else {
            // $comment_notice->update([
                //     'favorite' => 0,
                // ]);
            $condition = [
                ['id_users', $userId],
                ['id_notice', $id]
            ];
            if ($comment_notice_favorite[0]->favorite == 0) {
                $db = [
                    'favorite' => 1,
                ];
                DB::table('comment_notices')->where($condition)->update($db);
                // return "Cambiando a favorito";
                // return $comment_notice_favorite[0]->favorite;
            } else {
                $db = [
                    'favorite' => 0,
                ];
                DB::table('comment_notices')->where($condition)->update($db);
                // return "Desmarcando favorito";
                // return $comment_notice_favorite[0]->favorite;
            }
            /*$data = */

        }
        return redirect('noticias_gelato');
    }
    public function removeFavorite($id){
        $userId = Auth::id();
        $comment_notice = comment_notices::where('id_users', $userId)
        ->where('id_notice', $id)
        ->first();
        $comment_notice->update([
            'favorite' => 0,
        ]);
        return redirect('noticias_gelato');

    }
}
