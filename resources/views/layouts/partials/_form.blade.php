
<div class="form-group has-error" >
    <label for="nom" class="control-label sr-only">Nom</label>
<input type="text" placeholder="Nom" name="nom" id="nom" value="{{ old('nom') ?? $student->nom}}" class="form-control">
{!! $errors->first('nom','<span class="help-block">:message</span>')!!}
</div>
<hr>
<div class="form-group has-error">
        <label for="prenom" class="control-label sr-only">Prenom</label>
        <input type="text" placeholder="Prenom"  id="prenom" name="prenom" value="{{ old('prenom') ?? $student->prenom}}"class="form-control">
        {!! $errors->first('prenom','<span class="help-block">:message</span>')!!}
</div>
<hr>
<div class="form-group has-error">
    <select name="sexe" class="form-control">
        @if($student->sexe==="Feminin")
         <option selected="selected" value="Feminin">{{$student->sexe}}</option>
             <option  value="Masculin">Masculin</option>
        @elseif ($student->sexe==="Masculin")
            <option selected="selected" value="Masculin">{{$student->sexe}}</option>
            <option  value="Feminin">Feminin</option>
            @else
            <option selected="selected" value="Masculin">Masculin</option>
            <option  value="Feminin">Feminin</option>
        @endif
    </select>
    {{-- {!! $errors->first('prenom','<p class="error">:message</p>')!!}    --}}
</div>
<hr>
<div class="form-group has-error">
        <label for="telephone" class="control-label sr-only">Telephone</label>
    <input type="text" placeholder="Telephone" id="telephone" value="{{ old('telephone') ?? $student->telephone}}" name="telephone" class="form-control">
    {!! $errors->first('telephone','<span class="help-block">:message</span>')!!}  
</div>
<hr>
<div class="form-group has-error">
    <label for="email" class="control-label sr-only">Email</label>
    <input type="email" placeholder="Email" name="email" value="{{ old('email') ?? $student->email}}" class="form-control">
{!! $errors->first('email','<span class="help-block">:message</span>')!!} 


</div>

{{-- @if ($student->image)
<div  class="form-group" style="width: 20%; height:20%;">
    <img src="{{ asset('images/'.$student->image) }}" style="width: 100%;">
</div>
@endif --}}

<hr>
<div class="form-group">
    <input type="submit" value="{{ $submitButtonText }}" name="btnadd" class="btn btn-primary btn-block">
</div>





