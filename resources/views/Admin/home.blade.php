@extends('admin.master')
@section('content')

<div class="row">
        <div class="col-md-12">
         
            <section class="panel">
               
            <div class="panel-body">
                <section id="no-more-tables">
                    <table class="table table-bordered table-striped table-condensed cf">
                        <thead class="cf">
                            <tr>
                                <td><strong>Tên</strong></td>
                                <td><strong>{{$user->name}}</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td><strong>{{$user->email}}</strong></td>
                            </tr>
                        </thead>
                    </table>
                </section>
            </div>
        </section>
    </div>
</div>
   


@endsection