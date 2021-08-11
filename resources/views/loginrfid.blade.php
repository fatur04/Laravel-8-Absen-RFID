<script src="{{asset('template')}}/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        document.getElementById("linkid").click();
        
    });
</script> 
<form method="POST" action="{{ route('login') }}" >
    @csrf
    <input type="email" name="email" value="{{$login->email}}" onChange="this.form.submit()" required>
    <input type="password" name="password" value="{{$login->password_rfid}}" onChange="this.form.submit()" required>
    <input type="submit" id="linkid"/>
</form>

<style>

    form {
        display: none;
    }
</style>

