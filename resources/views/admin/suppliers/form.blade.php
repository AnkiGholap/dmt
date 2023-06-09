<div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Supplier Name*</label>
                <input type="text" name="name" class="form-control" placeholder="Supplier Name" value="{{$supplier->name ?? old('name')}}" required />
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Poc Email*</label>
                <input type="email" name="poc_email" class="form-control" placeholder="POC Email" value="{{$supplier->poc_email ?? old('poc_email')}}"  />
            </div>
        </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Poc Mobile*</label>
            <input type="number" name="poc_mobile" class="form-control" placeholder="Poc Mobile" value="{{$supplier->poc_mobile ?? old('poc_mobile')}}"  />
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Escalation Name*</label>
            <input type="text" name="escalation_name" class="form-control" placeholder="Escalation Name" value="{{$supplier->escalation_name ?? old('escalation_name')}}"  />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Escalation Email*</label>
            <input type="email" name="escalation_email" class="form-control" placeholder="Escalation Email" value="{{$supplier->escalation_email ?? old('escalation_email')}}"  />
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Escalation Mobile*</label>
            <input type="number" name="escalation_mobile" class="form-control" placeholder="Escalation Mobile" value="{{$supplier->escalation_mobile ?? old('escalation_mobile')}}" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Escalation Name*</label>
            <textarea name="address_of_facility" class="form-control" placeholder="Address Of Facility" value="{{$supplier->address_of_facility ?? old('address_of_facility')}}"></textarea>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Registered Address*</label>
            <textarea name="registered_address" class="form-control" placeholder="Registered Address" value="{{$supplier->registered_address ?? old('registered_address')}}"></textarea>
        </div>
    </div>
</div>
<div class="row">        
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