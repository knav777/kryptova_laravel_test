<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    form{
        min-width: 200px;
        max-width: 800px;
        padding: 10px;
        margin: 20px auto;
    }
</style>

<form action="{{route('users.create')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <h2>Signup</h2>
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" id="name" name="name" placeholder="type your name">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" type="email" id="email" name="email" placeholder="type your email">
    </div>
    <div class="form-group">
        <label for="date">Date:</label>
        <input class="form-control" id="date" name="date" type="date">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input class="form-control" type="password" id="password" name="password" placeholder="type your pass">
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input class="form-control" type="text" id="address" name="address" placeholder="type your address">
    </div>
    <div class="form-group">
        <label for="role">Role:</label>
        <select name="role" class="form-control" id="role">
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
        </select>
    </div>
    <div class="form-group">
        <label for="picture">Picture:</label>
        <input type="file" id="picture" name="picture" value="Subir imagen"/>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>