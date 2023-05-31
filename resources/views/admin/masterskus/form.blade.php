<div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <label>Category name*</label>
                <select name="category_id" id="category_id" class="form-control">
                <option value="">----Select Category----</option>
                @foreach($category as $item)
                <option value="{{ $item->id }}" {{isset($mastersku) && $mastersku->category_id == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Mastersku :</label>
                <div class="repeater mt-repeater mastersku">
                    <div data-repeater-list="mastersku">
                        <div class="row" data-repeater-item>
                            <div class="form-group col-md-8">    
                                
                                    <input type="text" name="mastersku" value="{{ $mastersku->mastersku ?? old('name')}}" class="form-control mastersku" placeholder="Master Sku" />
                            </div>
                            <div class="form-group col-md-4">
                                <input data-repeater-delete type="button" value="Delete" data-id="{{ isset($mastersku->id)?$mastersku->id:'' }}"
                                    class="form-control btn btn-secondary removeMasterSku" />
                            </div>
                        </div>    
                    </div>    
                </div>    
            </div>
        </div>

        
        <div class="col-md-2">
            <div class="form-group">
            <label>Add More :</label>
                <input data-repeater-create type="button" value="+ Add MasterSku"
                    id="mastersku-repeater-button" class="form-control btn btn-primary" />
            </div>        
        </div>
        
</div>
<div class="row">        
        <div class="col-sm-6">
           
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" @if(@$mastersku->status && $mastersku->status==1){{'selected'}}@endif>Active</option>
                        <option value="0" @if(@$mastersku->status && $mastersku->status==0){{'selected'}}@endif>Disabled</option>
                    </select>
                </div>
            
        </div>
       
</div>

<div class="box-footer">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

