            {{-- @include('layouts.partials._form',['submitButtonText'=>"Ajouter un etudiant"]) --}}
            <div class="form-group has-error" >
                <label for="nom" class="control-label sr-only">Nom</label>
            <input type="text" placeholder="Nom" name="nom" id="nom" value="{{ old('nom') ?? $course->nom}}" class="form-control">
            {!! $errors->first('nom','<span class="help-block">:message</span>')!!}
            </div>
            <hr>
             
    <div class="form-group">
    <input type="submit" value="{{ $submitButtonText }}" name="btnadd" class="btn btn-primary btn-block">
    </div>
