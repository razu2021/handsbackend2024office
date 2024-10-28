@extends('dashboard')
@section('content')

 
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-8  ">
            @foreach($allthreads as $threads)
                <div class="card mt-4">
                    <div class="all_threads">
                        <div class="threads_header">
                            <h1>{{$threads->task_name}}</h1>
                        </div>
                        <div class="threads_body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur natus incidunt consequatur tempore? Vitae recusandae molestias dolor vero expedita, eveniet dolorem, ullam ipsa veritatis aperiam placeat fugit ducimus hic nostrum.</p>
                        </div>
                        <div class="threads_footer">
                            <ul>
                                <li>name</li>
                            </ul>
                        </div>
                    </div>

                </div>
                @endforeach
                <!-- col end  -->
            </div>
            <div class="col-lg-2">fdfdf</div>
            
            <!-- end  -->
             
        </div>
    </div>
</section>





@endsection 