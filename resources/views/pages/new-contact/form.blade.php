<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" class="form-control" value="{{ old('name') ?: $contact->name }}">
</div>
<div class="form-group">
    <label for="contact">Contato</label>
    <input type="text" name="contact" class="form-control" value="{{ old('contact') ?: $contact->contact }}">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email') ?: $contact->email }}">
</div>
<div class="mt-3">
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary btn-sm-block">Submit</button>
</div>