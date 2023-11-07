@extends('layouts.guest')
@section('title', 'Contact us')
@section('css')
    <style>
        .bg-purple2{
            background-image: linear-gradient(to bottom right, #4036A9, #4036A2);
        }
        .bg-purple{
            background-color: #4036A9;
        }
        .h-max{
            height:100vh;
        }
        label{
            color:white;
            font-weight: bolder !important;
            font-size: 0.875rem !important;
        }
        input, select, textarea{
            font-weight: bolder !important;
            font-size: 1rem !important;
        }
        button{
            font-size: 1.25rem !important;
            color: #4036A9 !important;
        }
        h1{
            font-size: 4rem !important;
        }
        section>article>div>label.head{
            font-size: 2rem !important;
        }
    </style>
@endsection
@section('content')
    <main class="bg-purple2 w-100 px-4 py-5">
        <section class="d-flex justify-content-center py-5 flex-column align-items-center">
            <article class="w-75 py-3">
                <div class="text-justify">
                    <h1 class="fw-bold text-white">Interesed in our business pricing?</h1>
                </div>
                <div>
                    <label for="" class="text-white head">Fill out the form to view details and we'll contact you as soon as possible</label>
                </div>
            </article>
        </section>
        <form action="" method="post" class="m-0">
            <section class="container bg-purple card px-4 py-3">
                <article class="d-flex my-2">
                    <div class="px-2 w-100">
                        <label for="">Name</label>
                        <input type="text" class="form-control px-4 py-3" name="name" placeholder="Enter your name" id="">
                    </div>
                    <div class="px-2 w-100">
                        <label for="">Company email</label>
                        <input type="text" class="form-control px-4 py-3" name="email" placeholder="example@example.com" id="">
                    </div>
                </article>
                <article class="d-flex my-2">
                    <div class="w-100 px-2">
                        <label for="">Company size</label>
                        <select name="tamanio" class="form-select px-4 py-3" id="">
                            <option value=""> ---Select your company size--- </option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="w-100 px-2">
                        <label for="">Subject</label>
                        <select name="subject" class="form-select px-4 py-3" id="">
                            <option value=""> ---Select--- </option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                </article>
                <article class="my-3">
                    <div class="w-100 px-2">
                        <label for="">Message</label>
                        <textarea name="message" id="" placeholder="Write a description" class="form-control px-4 py-3" cols="30" rows="10"></textarea>
                    </div>
                </article>
                <article class="my-3">
                    <button class="btn btn-light w-100 p-3">Contact Sales</button>
                </article>
            </section>
        </form>
    </main>
@endsection
