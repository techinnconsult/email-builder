@extends('layouts.app')
@section('content')
<!-- BEGIN PAGE CONTENT -->
<div class="page-content page-builder">
    <div id="hidden-small-screen-message">
        <h2 class="m-t-40"><strong>Email Builder</strong> is not available on small screen.</h2>
        <p>Editor is not adapted to screen smaller than 1024px.</p>
        <p>For that reason, page builder is only visible on screen bigger.</p>
    </div>
    
    <div id="page-content">
         {!! $edit_html !!}
    </div>
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
                    <div class="form-group m-t-12">
                        <label class="control-label">Table Title <small>optionnal</small></label>
                        <div class="append-icon">
                            <input type="text" class="table-title form-control form-white" />
                            <i class="icon-pencil"></i>
                        </div>
                    </div>
                    <div class="form-group m-t-12">
                        <label class="control-label">Table Style</label>
                        <select style="width:100%" class="table-style form-control" data-placeholder="Choose table style...">
                            <option value="default">Default</option>
                            <option value="striped">Stripped row</option>
                            <option value="striped-cols">Stripped columns</option>
                            <option value="hover">Hover table</option>
                            <option value="bordered">Bordered</option>
                        </select>
                    </div>
                    <div class="form-group m-t-12">
                        <div class="m-t-6">
                            <div class="form-group">
                                <label class="control-label">Number of Columns</label>
                                <div class="append-icon">
                                    <input type="amount" class="table-columns form-control form-white" />
                                    <i class="icon-grid"></i>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-6">
                            <label class="control-label">Number of Rows</label>
                            <div class="append-icon">
                                <input type="amount" class="table-rows form-control form-white" />
                                <i class="icon-grid"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-t-12">
                        <label style="cursor: pointer;float:left;" id="pay-button-label" for="pay-button" class="control-label">Include Pay Button?
                            
                        </label>&nbsp<input style="float: left;margin-left: 10px;" id="pay-button" value="1" type="checkbox" class="pay-button" />
                        <div style="clear:both"></div>
                    </div>
                    <div id="linksBoxes">
                        
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
                <input type="hidden" name="colorsVal" value="" />
                    <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Cancel</button>
                    <button type="button" id="save-bg-color" class="btn btn-primary btn-embossed">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="change-row-background" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- MODAL BACKGROUND COLOR -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i>
                    </button>
                    <h4 class="modal-title">Change <strong>Row Background</strong></h4>
                </div>
                <div class="modal-body">
                    <ul class="colors-list">
                        <li onclick="changeColor('white')" class="white active"></li>
                        <li onclick="changeColor('primary')" class="primary"></li>
                        <li onclick="changeColor('dark')" class="dark"></li>
                        <li onclick="changeColor('red')" class="red"></li>
                        <li onclick="changeColor('green')" class="green"></li>
                        <li onclick="changeColor('blue')" class="blue"></li>
                        <li onclick="changeColor('aero')" class="aero"></li>
                        <li onclick="changeColor('gray')" class="gray"></li>
                        <li onclick="changeColor('orange')" class="orange"></li>
                        <li onclick="changeColor('pink')" class="pink"></li>
                        <li onclick="changeColor('purple')" class="purple"></li>
                    </ul>
                </div>
                <input type="hidden" class="selectedRowBg" value="" />
                <input class="current-row" type="hidden" name="current-row" value="" />
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-embossed color-close" data-dismiss="modal">Cancel</button>
                    <button type="button" id="save-row-background" class="btn btn-primary btn-embossed">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="color-picker" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- MODAL BACKGROUND COLOR -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i>
                    </button>
                    <h4 class="modal-title">Change <strong>Divider Color</strong></h4>
                </div>
                <div class="modal-body">
                    <ul class="colors-list">
                        <li onclick="changeDividerColor('white')" class="white active"></li>
                        <li onclick="changeDividerColor('primary')" class="primary"></li>
                        <li onclick="changeDividerColor('dark')" class="dark"></li>
                        <li onclick="changeDividerColor('red')" class="red"></li>
                        <li onclick="changeDividerColor('green')" class="green"></li>
                        <li onclick="changeDividerColor('blue')" class="blue"></li>
                        <li onclick="changeDividerColor('aero')" class="aero"></li>
                        <li onclick="changeDividerColor('gray')" class="gray"></li>
                        <li onclick="changeDividerColor('orange')" class="orange"></li>
                        <li onclick="changeDividerColor('pink')" class="pink"></li>
                        <li onclick="changeDividerColor('purple')" class="purple"></li>
                    </ul>
                </div>
                <input type="hidden" class="dividerColor" name="colorsVal" value="" />
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-embossed color-close" data-dismiss="modal">Cancel</button>
                    <button type="button" id="save-divider-color" class="btn btn-primary btn-embossed">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="payButtonPop" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- MODAL BACKGROUND COLOR -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i>
                    </button>
                    <h4 class="modal-title">Add <strong>Pay Button</strong></h4>
                </div>
                <div class="form-group m-t-10 form-link">
                    <label class="control-label">Pay Button Link:</label>
                    <div class="append-icon">
                        <input required="" type="text" name="pay-link-button" class="pay-link-button html-file-name form-control form-white required" />
                        <i class="icon-link-url"></i>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-embossed color-close" data-dismiss="modal">Cancel</button>
                    <button type="button" id="save-pay-link" class="btn btn-primary btn-embossed">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="social-media" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- MODAL SOCIAL MEDIA -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i>
                    </button>
                    <h4 class="modal-title">Add <strong>Social Media</strong> Links</h4>
                </div>
                <div class="modal-body">
                    <div class="after-add-more">
                        <div class="form-group m-t-10 form-link">
                            <label class="control-label">Social Media Link:</label>
                            <div class="append-icon">
                                <input required="" type="text" id="social-link" name="html-file-name" class="html-file-name form-control form-white required" />
                                <i class="icon-link-url"></i>
                            </div>
                        </div>
                        <div class="form-group m-t-10 form-link">
                            <label class="control-label">Select Social Media:</label>
                            <div class="input-group">
                                <select id="social-image" style="width:100%" name="social-media-type">
                                <?php 
                                    $dirname = public_path()."/social-logos/";
                                    $images = scandir($dirname);
                                    $ignore = Array(".", "..");
                                    foreach($images as $curimg){
                                        if(!in_array($curimg, $ignore)) {
                                            ?>
                                            <option value="<?php echo url()->to('/').'/social-logos/'.$curimg; ?>">
                                                <?php $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $curimg); echo $withoutExt; ?>
                                            </option>
                                <?php
                                        }
                                    }
                                ?>
                                </select>
                                <div class="input-group-btn"> 
                                    <button class="btn btn-success add-more-social" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="socialMediaWrapper">
                        <div id="socialMediaLinks" style="list-style:none;float: right;">

                        </div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <input type="hidden" name="colorsVal" value="" />
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-embossed color-close" data-dismiss="modal">Cancel</button>
                    <button type="button" id="save-social-media" class="btn btn-primary btn-embossed">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-export-page" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!-- MODALS EXPORT PAGE -->
        <form action="{{url('/email/save')}}" target="_blank" id="markupForm" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="markup" value="" id="markupField">
            <input type="hidden" value="{{$template->id}}" name="id" >
            <input type="hidden" value="{{$template->html_file}}" name="html_file" >
            <div class="modal-dialog" style="width:500px">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="icons-office-52"></i></span></button>
                        <h4 class="modal-title" id="myModalLabel">Export My Email Template</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group m-t-10 form-link">
                            <label class="control-label">Choose your Template Name:</label>
                            <div class="append-icon">
                                <input value="{{$template->title}}" required="" type="text" name="html-file-name" class="html-file-name form-control form-white required" />
                                <i class="icon-pencil"></i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer t-center">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="save-export">Export my Email</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="export-page">
        <a href="#" id="export" class="btn btn-dark btn-square btn-embossed">Export Email Template</a>
    </div>
</div>
<!-- END PAGE CONTENT -->
@endsection