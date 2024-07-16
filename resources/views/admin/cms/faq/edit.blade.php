<form id="edit_faq_form" action="{{route('admin.faq.update')}}">
    @csrf
    <input type="hidden" name="faq_id" value="{{base64_encode($data['faq']->id)}}">
    <div class="modal-header">
        <h4 class="modal-title">Edit FAQ</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Heading</label>
                    <input type="text" class="form-control eblogHeading" value="{{$data['faq']->heading}}" name="heading" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Country</label>
                    <select class="form-control" name="country_id" required>
                        <option value="">Select</option>
                        @foreach ($data['countries'] as $country)
                        <option value="{{ $country->id }}" {{ $country->id == $data['faq']->country_id ? 'selected' : '' }}>
                        {{ $country->name }}
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="content" id="content2" rows="10">{{$data['faq']->content}}</textarea>
                </div>
            </div>
        </div>

    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>