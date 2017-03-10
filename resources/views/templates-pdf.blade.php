@extends('layouts.pdf')
@section('content')
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="header">
        <h2>PDF <strong>Templates</strong></h2>
    </div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-content">
                    <div class="m-b-20">
                        <div class="btn-group">
                            <a href="{{ URL::to('/pdf/')}}" id="table-edit_new" class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> Add New PDF Template</a>
                        </div>
                    </div>
                    <table class="table table-hover dataTable" id="table-editable">
                        <thead>
                            <tr>
                                <th>Template Name</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($template as $t)
                            <tr>
                                <td>{{$t->title}}</td>
                                <td class="text-right">
                                    <a class="edit btn btn-sm btn-blue" href="{{ URL::to('/pdf/download/' . $t->pdf_file) }}">
                                        <i class="glyphicon glyphicon-cloud-download"></i>
                                    </a>
                                    <a class="edit btn btn-sm btn-default" href="{{ URL::to('/pdf/edit/' . $t->pdf_file) }}">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a class="edit btn btn-sm btn-danger" href="{{ URL::to('/pdf/delete/' . $t->id) }}">
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