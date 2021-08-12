@extends('homepage.template')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="row">



                   <div class="col-lg-12">
                       <div  id="newest-member" role="tabpanel" class="block-box user-about">
                           <div class="widget-heading">
                               <h3 class="widget-title">Öğrenci Rozetleri</h3>
                           </div>
                           <ul class="user-info">




                               @foreach($rosette as $key=>$rosettes)
                               <li>
                                   <label>{{$rosettes->rosette->name}}</label>
                                   <img style="width: 300px" src="/{{$rosettes->rosette->logo}}" alt="">
                               </li>
                                   <br>
                               @endforeach

                           </ul>
                       </div>
                   </div>




            </div>
        </div>
    </div>


@endsection

@section('css')

@endsection

@section('js')

@endsection
