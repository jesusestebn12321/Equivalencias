<li class="nav-item">
  <a class="nav-link font-italic" href="{{route('Matter.index')}}">
    <i class="ni ni-book-bookmark text-indigo"></i> Unidad Curricular
  </a>
</li>
{{-- @if(Auth::user()->matter_user->rol_teacher==true) --}}
<li class="nav-item">
  <a class="nav-link font-italic" href="{{route('Content.index')}}">
    <i class="ni ni-folder-17 text-info"></i> Cargar Contenido
  </a>
</li>
{{-- @endif --}}