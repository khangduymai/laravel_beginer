             <!--This is using <form> and <input type submit> -->
                <form action='/checkGrade' method='POST'>
                    <!--using @csrf for POST method -->
                    @csrf
                    <div class="title m-b-md">
                        Welcome to grading calculating 
                    </div>

                    <div class="input">
                        Enter your grade: <input type="text" name="grade"><br>
                    </div>

                    <input type='submit' class='btn btn-danger' name='submit' value="submit">
                </form>