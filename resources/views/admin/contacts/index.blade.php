@extends('admin.template')

@section('icerik')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Gelen Mesajlar Tablosu</h4>
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>#</th>
                                <th>Mesaj Gönderen</th>
                                <th>Konu</th>
                                <th>Durumu</th>
                                <th>Git</th>
                            </tr>
                            @foreach($contact_index  as $key=>$contacts)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$contacts->name}}</td>
                                    <td>{{$contacts->subject}}</td>
                                    <td>{{$contacts->status==0?'Pasif':''}}{{$contacts->status==1?'Aktif':''}}</td>
                                    <td><a class="btn btn-xs btn-warning" href="{{route('contact_edit',$contacts->id)}}"><i class="fa fa-pencil-square-o"></i></a></td>

                                </tr>
                            @endforeach
                        </table>
                        <ul class="pagination pagination-sm pull-right">
{{--                            {{ $contact_index->links() }}--}}
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
