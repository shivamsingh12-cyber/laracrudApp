<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
</head>
<body>
    <form action="{{url('saveNewUser')}}" method="post" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="fname" id="" required>
                    @error('fname')
                        <p>{{$message}}</p>
                    @enderror
                
                </td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="number" name="age" id="" required>
                     @error('age')
                        <p>{{$message}}</p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    
                   Male <input type="radio" name="gender" value="male" required>
                   Female <input type="radio" name="gender" value="female">
                        @error('gender')
                        <p>{{$message}}</p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Course</td>
                <td>
                    <select name="course" id="" required>
                        <option value="">Select here</option>
                        <option value="msc" >MSC</option>
                        <option value="csc">CSC</option>
                        <option value="bsc">BSC</option>
                             @error('course')
                        <p>{{$message}}</p>
                    @enderror
                    </select>
                </td>
            </tr>
            <tr>
                <td>City</td>
                <td>
                    Bihar<input type="checkbox" name="city" value="bihar" required>
                   Jharkhand <input type="checkbox" name="city" value="jharkhand">
                        @error('city')
                        <p>{{$message}}</p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image" id="">
                     @error('image')
                        <p>{{$message}}</p>
                    @enderror</td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Submit</button></td>
            </tr>
        </table>
    </form>
</body>
</html>