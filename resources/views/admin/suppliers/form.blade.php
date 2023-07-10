<div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Supplier Name*</label>
                <input type="text" name="name" class="form-control" placeholder="Supplier Name" value="{{$supplier->name ?? old('name')}}" required />
            </div>
        </div>
        <div class="col-sm-6">
           
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" @if(@$supplier->status && $supplier->status==1){{'selected'}}@endif>Active</option>
                    <option value="0" @if(@$supplier->status && $supplier->status==0){{'selected'}}@endif>Disabled</option>
                </select>
            </div>
        
    </div>
</div>

<div class="box-footer">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>