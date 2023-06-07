<div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Product Sku*</label>
                <select name="product_sku_id" id="product_sku_id" class="form-control select2">
                <option value="">----Select Product Sku----</option>
                @foreach($sku as $item)
                <option value="{{ $item->id }}" {{isset($purchaseorder) && $purchaseorder->product_sku_id == $item->id ? 'selected' : '' }}>
                    {{ $item->sku_code }}</option>
                @endforeach
                </select>
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label>PO Expected to arrive in 15 days*</label>
                <input type="number" name="po_expected" class="form-control" placeholder="PO Expected" value="{{isset($purchaseorder->po_expected)?$purchaseorder->po_expected:old('po_expected')}}" required />
            </div>
        </div>
       
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Open PO Quantity*</label>
            <input type="number" name="open_po_quantity" class="form-control" placeholder="Open Po Quantity" value="{{isset($purchaseorder->open_po_quantity)?$purchaseorder->open_po_quantity:old('open_po_quantity')}}" required />
        </div>
    </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Next Inbound Quantity*</label>
                <input type="number" name="next_inbound_quantity" class="form-control" placeholder="Next Inbound Quantity" value="{{isset($purchaseorder->next_inbound_quantity)?$purchaseorder->next_inbound_quantity:old('next_inbound_quantity')}}" required />
            </div>
        </div>   
       
       
       
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Next Inbound Date*</label>
            <input type="date" name="next_inbound_date" class="form-control" placeholder="Next Inbound Date" value="{{isset($purchaseorder->next_inbound_date)?$purchaseorder->next_inbound_date:old('next_inbound_date')}}" required />
        </div>
    </div>    
    <div class="col-sm-6">
           
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" @if(@$category->status && $category->status==1){{'selected'}}@endif>Active</option>
                <option value="0" @if(@$category->status && $category->status==0){{'selected'}}@endif>Disabled</option>
            </select>
        </div>
    
</div>
</div>
<div class="box-footer">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>