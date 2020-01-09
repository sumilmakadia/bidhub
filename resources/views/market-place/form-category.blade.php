<style>
.fileuploader-theme-thumbnails .fileuploader-items .fileuploader-items-list {
    margin: -30px 0 0 0px!important;
}
.fileuploader-theme-thumbnails .fileuploader-thumbnails-input, .fileuploader-theme-thumbnails .fileuploader-items-list .fileuploader-item {
    width: 250px!important;
    height: 250px!important;
    margin-left: 0!important;
        margin-right: 20px!important;
}
.fileuploader-theme-thumbnails .fileuploader-thumbnails-input-inner{
        cursor: pointer!important;
}
#portfolio-wrap {
    width:250px;
}
</style>
<div class="form-group {{ $errors->has('category_name') ? 'has-error' : '' }}">
    <label for="category_name" class="col-md-2 control-label">Category Name</label>
    <div class="col-md-10">
        <input class="form-control" name="category_name" type="text" id="category_name" value="{{ old('category_name', optional($category)->title) }}" maxlength="255" placeholder="Category Name" required>
        {!! $errors->first('category_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>



