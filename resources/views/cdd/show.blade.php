<!-- Modal: Contact form -->
<div class="modal fade" id="modalCddShow{{ $user['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <!-- Content -->
  <div class="modal-content">

    <div class="modal-header">
      <h5 class="modal-title mmfont pro_semi_light" id="exampleModalLabel">User Detail</span></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

   <div class="modal-body ">
    <eiv class="container row">
      <div class="col-6 pro_light">
        Profile<br>
        <img src="{{ asset('assets/images/default/staff_profile.png') }}" style="width: 150px; margin-top: 5px;" class="img-thumbnail" alt="">
      </div>
      <div class="col-6 mb-4 pro_light">
        NRC<br>
        <img src="{{ asset('assets/images/default/placeholder.jpg') }}" style="height: 150px; width: 300px; margin-top: 5px;" class="img-thumbnail" alt="">
      </div>
     <div class="col-4 pro_light">Name</div>
     <div class="col-8 confort" style="color: #535353;">
       {!! (!$user['name'] || $user['name'] == "") ? '<span class="badge badge-light">none</span>' : $user['name'] !!}
     </div>
     <hr>
     <div class="col-4 pro_light">Email</div>
     <div class="col-8 confort" style="color: #535353;">
       {!! (!$user['email'] || $user['email'] == "") ? '<span class="badge badge-light">none</span>' : $user['email'] !!}
     </div>
     <hr>
     <div class="col-4 pro_light">Phone No</div>
     <div class="col-8 confort" style="color: #535353;">
       {!! (!$user['phone'] || $user['phone'] == "") ? '<span class="badge badge-light">none</span>' : $user['phone'] !!}
     </div>
     <hr>
     <div class="col-4 pro_light">NRC No</div>
     <div class="col-8 confort" style="color: #535353;">
       {!! (!$user['nrc_no'] || $user['nrc_no'] == "") ? '<span class="badge badge-light">none</span>' : $user['nrc_no'] !!}
     </div>
     {{-- <hr>
     <div class="col-4 pro_light">Role</div>
     <div class="col-8 confort" style="color: #535353;">
       {!! (!$user['role'] || $user['role'] == "") ? '<span class="badge badge-light">none</span>' : $user['role'] !!}
     </div> --}}
     <hr>
     <div class="col-4 pro_light">Address</div>
     <div class="col-8 confort" style="color: #535353;">
       {!! (!$user['address'] || $user['address'] == "") ? '<span class="badge badge-light">none</span>' : $user['address'] !!}
     </div>

     <hr style="border-color: gray !important;">

     <div class="container row mb-2">
        {{-- <div class="col-12 pt-3">
          <b>Transaction at: </b><span class="text-black-50 mmfont">{{ \Carbon\Carbon::parse($user['transaction_date'])->format('d/m/Y h:i A') }}</span>
        </div> --}}
        <div class="col-12 pt-3">
          <b>Registered at: </b><span class="text-black-50 mmfont">{{ \Carbon\Carbon::parse($user['created_at'])->format('d/m/Y h:i A') }}</span>
        </div>
      </div>
      </eiv>
   </div>

  </div>
  <!-- Content -->
</div>
</div>

