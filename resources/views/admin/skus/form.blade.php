<div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Sku Code*</label>
                <input type="text" name="sku_code" class="form-control" placeholder="Sku Code" value="{{$sku->sku_code ?? old('sku_code')}}" required />
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Product Name*</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$sku->name ?? old('name')}}" required />
            </div>
        </div>
        
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Category*</label>
            <select name="category_id" id="category_id" class="form-control">
            <option value="">----Select Category----</option>
            @foreach($category as $item)
            <option value="{{ $item->id }}" {{isset($sku) && $sku->category_id == $item->id ? 'selected' : '' }}>
                {{ $item->name }}</option>
            @endforeach
            </select>
        </div>
    </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Supplier*</label>
                <select name="supplier_id" id="supplier_id" class="form-control">
                    <option value="">----Select Supplier----</option>
                    @foreach($supplier as $item)
                    <option value="{{ $item->id }}" {{isset($sku) && $sku->supplier_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
       
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Master Sku*</label>
            <select name="master_sku_id" id="master_sku_id" class="form-control">
                <option value="">----Select Master Sku----</option>
                @foreach($mastersku as $item)
                <option value="{{ $item->id }}" {{isset($sku) && $sku->master_sku_id == $item->id ? 'selected' : '' }}>
                    {{ $item->mastersku }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-6">
            <div class="form-group">
                <label>Price*</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{$sku->price ?? old('name')}}" required />
            </div>
    </div>
   
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" @if(@$sku->status && $sku->status==1){{'selected'}}@endif>Active</option>
                <option value="0" @if(@$sku->status && $sku->status==0){{'selected'}}@endif>Disabled</option>
            </select>
        </div>
</div>
</div>
<div class="box-footer">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>