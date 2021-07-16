<x-app-layout>

	<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Medium</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

    </head>

	<!-- Page Header-->
    <header class="masthead" style="background-image: url('{{ asset($post->image) }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>{{ $post->title }}</h1>
                        <span class="subheading">Posted by {{ $post->author->name }} on {{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="flex flex-col lg:grid lg:gap-4 2xl:gap-6 lg:grid-cols-4 2xl:row-span-2 2xl:pb-8 ml-2 pt-4 px-6">
    	<div class="lg:order-1 lg:row-span-1 2xl:row-span-1 lg:col-span-2 rounded-lg mb-5 lg:mb-0 row gx-4 gx-lg-5 justify-content-center">
    		<p>{{ $post->content }}</p>
       </div>

       <div class="lg:order-2 lg:row-span-4 lg:col-span-1 rounded-lg shadow-xl mb-5 lg:pb-4 2xl:h-screen row gx-4 gx-lg-5 justify-content-center">
        <div class="mx-8 my-8 lg:pl-1">
            <p>Categories</p><br>
            <p>Tags</p><br>
            <p>Claps</p>
        </div>
       </div>
   </div>
	

</x-app-layout>