 @if (session('success'))
 <div id="alertBox" class="alert alert-success alert-dismissible show fade">
   <div class="alert-body">
     <button class="close" data-dismiss="alert">
       <span>×</span>
     </button>
     {{ session('success') }}
   </div>
 </div>
 @endif