@extends('layouts.app')
@section('content')
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="header">
        <h2>Email <strong>Templates</strong></h2>
    </div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-content">
                    <div class="m-b-20">
                        <div class="btn-group">
                            <a href="{{ URL::to('/')}}" id="table-edit_new" class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> Add New Email Template</a>
                        </div>
                    </div>
                    <table class="table table-hover dataTable" id="table-editable">
                        <thead>
                            <tr>
                                <th>Template Name</th>
                                <th class="text-right">Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($template as $t)
                            <tr>
                                <td>{{$t->title}}</td>
                                <td class="text-right">
                                    <a class="edit btn btn-sm btn-blue" target="_blank" href="{{ URL::to('/email/preview/' . $t->html_file) }}">
                                        <i class="glyphicon glyphicon-cloud-download"></i>
                                    </a>
                                    <a class="edit btn btn-sm btn-default" href="{{ URL::to('/email/edit/' . $t->html_file) }}">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a class="edit btn btn-sm btn-danger" href="{{ URL::to('/email/delete/' . $t->id) }}">
                                        <i class="glyphicon glyphicon-minus"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT -->
@endsection