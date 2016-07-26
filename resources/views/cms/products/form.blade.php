@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <!-- form start -->
        <form action="{{ $product->id ? route('cms.products.update', $product->id) : route('cms.products.store') }}"
              id="js-save-post-form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ $product->id ? method_field('PUT') : '' }}

            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product</h3>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="">Title:</label>
                            <input name="title" type="text" class="form-control" placeholder="Enter title"
                                   value="{{ $product->title }}">

                            @if ($errors->has('title'))
                                <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }}">
                            <label for="">Description:</label>
                            <input name="short_description" type="text" class="form-control"
                                   placeholder="Enter description" value="{{ $product->short_description }}">

                            @if ($errors->has('short_description'))
                                <span class="help-block"><strong>{{ $errors->first('short_description') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="">Content:</label>
                            <textarea name="content" id="summernote" class="hidden">{{ $product->content }}</textarea>

                            @if ($errors->has('content'))
                                <span class="help-block"><strong>{{ $errors->first('content') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                            <label for="">SEO Title:</label>
                            <input name="seo_title" type="text" class="form-control" placeholder="Enter SEO title"
                                   value="{{ $product->seo_title }}">
                        </div>
                        <div class="form-group{{ $errors->has('seo_description') ? ' has-error' : '' }}">
                            <label for="">SEO Description:</label>
                            <input name="seo_description" type="text" class="form-control"
                                   placeholder="Enter SEO description"
                                   value="{{ $product->seo_description }}">
                        </div>
                        <div class="form-group{{ $errors->has('seo_keywords') ? ' has-error' : '' }}">
                            <label for="">SEO Keywords:</label>
                            <input name="seo_keywords" type="text" class="form-control" placeholder="Enter SEO keywords"
                                   value="{{ $product->seo_keywords }}">
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

            <div class="col-md-4">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Represent Image</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <p>Use these services to upload image:
                            <a href="https://www.flickr.com/" target="blank">Flickr</a>,
                            <a href="http://imgur.com/" target="blank">Imgur</a>,
                            <a href="http://2.pik.vn/" target="blank">pik.vn</a></p>
                        <label for="">Image URL:</label>
                        <div class="input-group input-group-sm">
                            <input name="represent_image" id="js-input-image-url" type="text" class="form-control"
                                   placeholder="Ex: http://i.imgur.com/nCrA1Bp.png">
                            <span class="input-group-btn">
                                <button id="js-button-get-image-from-url" type="button" class="btn btn-info btn-flat"
                                        disabled="disabled">Get</button>
                            </span>
                        </div>

                        @if ($errors->has('represent_image'))
                            <span class="help-block"><strong>{{ $errors->first('represent_image') }}</strong></span>
                        @endif

                        <p id="js-p-get-result" class="margin text-red"></p>

                        <img id="js-image-thumbnail-gotten" src="{{ $product->represent_image_path }}" width="100%"
                             height="auto">
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Price</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="">Regular Price:</label>
                            <div class="input-group">
                                <input name="price" type="text" class="form-control" placeholder="100.000"
                                       value="{{ $product->price }}">
                                <span class="input-group-addon">đ</span>
                            </div>

                            @if ($errors->has('price'))
                                <span class="help-block"><strong>{{ $errors->first('price') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('discount_price') ? ' has-error' : '' }}">
                            <label for="">Discount Price:</label>
                            <div class="input-group">
                                <input name="discount_price" type="text" class="form-control" placeholder="85.000"
                                       value="{{ $product->discount_price }}">
                                <span class="input-group-addon">đ</span>
                            </div>

                            @if ($errors->has('discount_price'))
                                <span class="help-block"><strong>{{ $errors->first('discount_price') }}</strong></span>
                            @endif
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-primary btn-flat pull-right" onclick="$('#js-save-post-form').submit()">
                            Save
                        </button>
                    </div>
                </div><!-- /.box -->

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Categories</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            @forelse (App\Category::lists('name', 'id') as $id => $name)
                                <div class="checkbox">
                                    <label><input name="category_ids[]" type="checkbox" value="{{ $id }}"
                                                {{ in_array($id, $categories) ? 'checked' : '' }}> {{ $name }}</label>
                                </div>
                            @empty
                                <p>Please add categories</p>
                            @endforelse
                        </div>
                    </div> <!-- /.box-body -->
                </div><!-- /.box -->

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tags</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <select name="tag_ids[]" class="form-control select2" multiple style="width: 100%">
                            @foreach (App\Tag::lists('name', 'id') as $id => $name)
                                <option value="{{ $id }}" {{ in_array($id, $tags) ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </form>
    </div>
@endsection