@extends('layouts.pdf')
@section('content')
<!-- BEGIN PAGE CONTENT -->
<div class="page-content page-builder">
    <div id="hidden-small-screen-message">
        <h2 class="m-t-40"><strong>Page Builder</strong> is not available on small screen.</h2>
        <p>Editor is not adapted to screen smaller than 1024px.</p>
        <p>For that reason, page builder is only visible on screen bigger.</p>
    </div>
    <div id="page-builder" class="bg-primary">
        <div class="tabs tabs-linetriangle">
            <ul class="nav nav-tabs">
                <li class="width-16p active"><a href="#layout" data-toggle="tab"><span class="text-center">Layout</span></a></li>
                <li class="width-16p"><a href="#portlets" data-toggle="tab"><span class="text-center">Panels</span></a></li>
                <li class="width-16p"><a href="#text" data-toggle="tab"><span class="text-center">Text &amp; Images</span></a></li>
                <li class="width-16p"><a href="#tables" data-toggle="tab"><span class="text-center">Tables</span></a></li>
            </ul>
            <div class="tab-content clearfix">
                <div class="tab-pane fade in active" id="layout">
                    <div data-layout="one-column" class="layout">
                        <p><strong>1 column</strong></p>
                        <p>100%</p>
                    </div>
                    <div data-layout="two-column-50" class="layout">
                        <p><strong>2 columns</strong></p>
                        <p>2 x 50%</p>
                    </div>
                    <div data-layout="two-column-33" class="layout">
                        <p><strong>2 columns</strong></p>
                        <p>33% + 66%</p>
                    </div>
                    <div data-layout="two-column-66" class="layout">
                        <p><strong>2 columns</strong></p>
                        <p>66% + 33%</p>
                    </div>
                    <div data-layout="three-column-33" class="layout">
                        <p><strong>3 columns</strong></p>
                        <p>3x 33%</p>
                    </div>
                    <div data-layout="three-column-25" class="layout">
                        <p><strong>3 columns</strong></p>
                        <p>25% + 50% + 25%</p>
                    </div>
                    <div data-layout="four-column" class="layout">
                        <p><strong>4 columns</strong></p>
                        <p>4 x 25%</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="portlets">
                    <div data-portlet="basic" class="portlet">Basic Panel</div>
                    <div data-portlet="header" class="portlet">With Header</div>
                    <div data-portlet="footer-txt" class="portlet">With Footer
                        <br> Text
                    </div>
                    <div data-portlet="header-footer" class="portlet">Header &amp; Footer</div>
                </div>
                <div class="tab-pane fade" id="text">
                    <div data-element="image" class="element">Image</div>
                    <div data-element="paragraph" class="element">Paragraph</div>
                    <div data-element="title-h1" class="element">Big Title h1</div>
                    <div data-element="title-h2" class="element">Medium Title h2</div>
                    <div data-element="title-h3" class="element">Small Title h3</div>
                    <div data-element="video" class="element build-video">Video</div>
                </div>
                <div class="tab-pane fade" id="tables">
                    <div data-table="table" class="build-table">Table Basic</div>
                </div>
            </div>
        </div>
    </div>
    <div class="builder-wrapper">
     
        <table style="margin: auto;" width="600" class="row" align="center" border="0" cellspacing="0" cellpadding="0">
            <tbody class="placeholder-container">
                <tr class="placeholder">
                    <td class="placeholder-content col-md-12">
                        <table class="placeholder-content-area">
                            <tr>
                                <td>
                                    <h2>Email <strong>Builder</strong></h2>
                                    <p>Welcome to Make Email builder! You can customize easily and quickly your page. Don't hesitate to send us suggestions to improve this tool.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="placeholder-handle">
                    <td>
                        <div class="handle-move" data-rel="tooltip" data-placement="right" data-original-title="Move"><i class="fa fa-bars"></i></div>
                        <div class="handle-remove" data-rel="tooltip" data-placement="right" data-original-title="Remove"><i class="fa fa-times"></i></div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="margin: auto;" width="600" class="row" align="center" border="0" cellspacing="0" cellpadding="0">
            <tbody class="placeholder-container">
                <tr class="placeholder">
                    <td class="placeholder-content col-md-6">
                        <table style="width:100%;height:40px" class="placeholder-content-area">
                            <tr>
                                <td>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="placeholder-content col-md-6">
                        <table style="width:100%;height:40px" class="placeholder-content-area">
                            <tr>
                                <td>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="placeholder-handle">
                    <td>
                        <div class="handle-move" data-rel="tooltip" data-placement="right" data-original-title="Move"><i class="fa fa-bars"></i></div>
                        <div class="handle-remove" data-rel="tooltip" data-placement="right" data-original-title="Remove"><i class="fa fa-times"></i></div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="margin: auto;" width="600" class="row" align="center" border="0" cellspacing="0" cellpadding="0">
            <tbody class="placeholder-container">
                <tr class="placeholder">
                    <td class="placeholder-content col-md-8">
                        <table style="width:100%" class="placeholder-content-area">
                            <tr>
                                <td style="height: 40px">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="placeholder-content col-md-4">
                        <table style="width:100%" class="placeholder-content-area">
                            <tr>
                                <td style="height: 40px">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="placeholder-handle">
                    <td>
                        <div class="handle-move" data-rel="tooltip" data-placement="right" data-original-title="Move"><i class="fa fa-bars"></i></div>
                        <div class="handle-remove" data-rel="tooltip" data-placement="right" data-original-title="Remove"><i class="fa fa-times"></i></div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="margin: auto;" width="600" class="row" align="center" border="0" cellspacing="0" cellpadding="0">
            <tbody class="placeholder-container">
                <tr class="placeholder">
                    <td class="placeholder-content col-md-4">
                        <table style="width:100%" class="placeholder-content-area">
                            <tr>
                                <td style="height: 40px">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="placeholder-content col-md-8">
                        <table style="width:100%" class="placeholder-content-area">
                            <tr>
                                <td style="height: 40px">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="placeholder-handle">
                    <td>
                        <div class="handle-move" data-rel="tooltip" data-placement="right" data-original-title="Move"><i class="fa fa-bars"></i></div>
                        <div class="handle-remove" data-rel="tooltip" data-placement="right" data-original-title="Remove"><i class="fa fa-times"></i></div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="margin: auto;" width="600" class="row" align="center" border="0" cellspacing="0" cellpadding="0">
            <tbody class="placeholder-container">
                <tr class="placeholder">
                    <td class="placeholder-content col-md-4">
                        <table style="width:100%" class="placeholder-content-area">
                            <tr>
                                <td style="height: 40px">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="placeholder-content col-md-4">
                        <table style="width:100%" class="placeholder-content-area">
                            <tr>
                                <td style="height: 40px">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="placeholder-content col-md-4">
                        <table style="width:100%" class="placeholder-content-area">
                            <tr>
                                <td style="height: 40px">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="placeholder-handle">
                    <td>
                        <div class="handle-move" data-rel="tooltip" data-placement="right" data-original-title="Move"><i class="fa fa-bars"></i></div>
                        <div class="handle-remove" data-rel="tooltip" data-placement="right" data-original-title="Remove"><i class="fa fa-times"></i></div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="margin: auto;margin-bottom: 20px;margin-top: 20px;" width="600" class="row" align="center" border="0" cellspacing="0" cellpadding="0">
            <tbody class="placeholder-container">
                <tr class="placeholder">
                    <td class="placeholder-content col-md-3">
                        <table style="width:100%" class="placeholder-content-area">
                            <tr>
                                <td style="height: 40px">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="placeholder-content col-md-6">
                        <table style="width:100%" class="placeholder-content-area">
                            <tr>
                                <td style="height: 40px">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="placeholder-content col-md-3">
                        <table style="width:100%" class="placeholder-content-area">
                            <tr>
                                <td style="height: 40px">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="placeholder-handle">
                    <td>
                        <div class="handle-move" data-rel="tooltip" data-placement="right" data-original-title="Move"><i class="fa fa-bars"></i></div>
                        <div class="handle-remove" data-rel="tooltip" data-placement="right" data-original-title="Remove"><i class="fa fa-times"></i></div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="margin: auto;" width="600" class="row" align="center" border="0" cellspacing="0" cellpadding="0">
            <tbody class="placeholder-container">
                <tr class="placeholder">
                    <td class="placeholder-content col-md-3">
                        <table style="width:100%" class="placeholder-content-area">
                            <tr>
                                <td style="height: 40px">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="placeholder-content col-md-3">
                        <table style="width:100%" class="placeholder-content-area">
                            <tr>
                                <td style="height: 40px">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="placeholder-content col-md-3">
                        <table style="width:100%" class="placeholder-content-area">
                            <tr>
                                <td style="height: 40px">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="placeholder-content col-md-3">
                        <table style="width:100%" class="placeholder-content-area">
                            <tr>
                                <td style="height: 40px">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="placeholder-handle">
                    <td>
                        <div class="handle-move" data-rel="tooltip" data-placement="right" data-original-title="Move"><i class="fa fa-bars"></i></div>
                        <div class="handle-remove" data-rel="tooltip" data-placement="right" data-original-title="Remove"><i class="fa fa-times"></i></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="clear: both;height: 100px;"></div>
    <div class="modal fade" id="table" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- MODAL TABLE -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i>
                    </button>
                    <h4 class="modal-title"><strong>Form</strong> Table</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group m-t-10">
                        <label class="control-label">Table Title <small>optionnal</small></label>
                        <div class="append-icon">
                            <input type="text" class="table-title form-control form-white" />
                            <i class="icon-pencil"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Table Style</label>
                        <select class="table-style form-control" data-placeholder="Choose table style...">
                            <option value="default">Default</option>
                            <option value="striped">Stripped row</option>
                            <option value="hover">Hover table</option>
                            <option value="bordered">Bordered</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Number of Columns</label>
                                <div class="append-icon">
                                    <input type="amount" class="table-columns form-control form-white" />
                                    <i class="icon-grid"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                                <label class="control-label">Number of Rows</label>
                                <div class="append-icon">
                                    <input type="amount" class="table-rows form-control form-white" />
                                    <i class="icon-grid"></i>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Close</button>
                    <button type="button" id="save-table" class="btn btn-primary btn-embossed">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="video" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- MODAL VIDO -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i>
                    </button>
                    <h4 class="modal-title"><strong>Add</strong> Video</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group m-t-10">
                        <label class="control-label">Video Title <small>optionnal</small></label>
                        <div class="append-icon">
                            <input type="text" class="video-title form-control form-white" />
                            <i class="icon-pencil"></i>
                        </div>
                    </div>
                    <div class="form-group m-t-10">
                        <label class="control-label">Video Link </label>
                        <div class="append-icon">
                            <input type="text" class="video-link form-control form-white" />
                            <i class="icon-link"></i>
                        </div>
                    </div>
                    <div class="form-group m-t-10">
                        <label class="control-label">Upload Preview Image <small>optionnal</small></label>
                        <div class="append-icon">
                            <input type="file" class="video-images form-control form-white" />
                            <i class="icon-file"></i>
                        </div>
                    </div>
                    <div id='preview-image' class="form-group m-t-10">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Close</button>
                    <button type="button" id="save-video" class="btn btn-primary btn-embossed">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="custom-layout" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- MODAL CUSTOM LAYOUT -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i>
                    </button>
                    <h4 class="modal-title">Custom <strong>Layout</strong></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group m-b-0">
                        <label class="control-label">Choose number of columns / sections you need</label>
                        <div class="input-group m-t-10">
                            <div style="width:545px;" class="primary m-b-10 m-t-20 m-l-10">
                                <div data-slider-tooltip="always" id="num-columns"  class="custom-slide-columns" data-slider-min="1" data-slider-max="12" data-slider-value="3"></div>
                            </div>
                        </div>
                        <div  class="slider-wrap p-20 m-t-40" style="margin-left:-8px">
                            <div id="slider-custom-columns"></div>
                            <input type="hidden" class="value-columns form-control" name="col[widths]" value="4/12_4/12_4/12" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Cancel</button>
                    <button type="button" id="save-custom-layout" class="btn btn-primary btn-embossed">Create Layout</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-export-page" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!-- MODALS EXPORT PAGE -->
        <form action="{{url('/preview')}}" id="markupForm" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="markup" value="" id="markupField">
            <div class="modal-dialog" style="width:500px">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="icons-office-52"></i></span></button>
                        <h4 class="modal-title" id="myModalLabel">Export My Page Template</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group m-t-10 form-link">
                            <label class="control-label">Choose your Template Name:</label>
                            <div class="append-icon">
                                <input required="" type="text" name="html-file-name" class="html-file-name form-control form-white required" />
                                <i class="icon-pencil"></i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer t-center">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="save-export">Export my Page</button>
                        <div class="alert alert-info m-t-20 p-10">
                            <p class="f-13">After uploading your template, copy and past your file inside admin folder, with other admin pages.</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal fade" id="modal-background" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- MODAL BACKGROUND COLOR -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i>
                    </button>
                    <h4 class="modal-title">Change <strong>Background Color</strong></h4>
                </div>
                <div class="modal-body">
                    <ul class="colors-list">
                        <li class="white"></li>
                        <li class="primary"></li>
                        <li class="dark"></li>
                        <li class="red"></li>
                        <li class="green"></li>
                        <li class="blue active"></li>
                        <li class="aero"></li>
                        <li class="gray"></li>
                        <li class="orange"></li>
                        <li class="pink"></li>
                        <li class="purple"></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Cancel</button>
                    <button type="button" id="save-bg-color" class="btn btn-primary btn-embossed">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="export-page">
        <a href="#" id="export" class="btn btn-dark btn-square btn-embossed">Export Page Template</a>
    </div>
</div>
<!-- END PAGE CONTENT -->
@endsection

<script src="{{url('builder/email-builder/js')}}/builder_page.js"></script>