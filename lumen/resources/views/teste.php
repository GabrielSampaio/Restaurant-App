<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form id="form">
      <input type="text" name="name" value="Friends Bar">
      <input type="text" name="description" value="Melhor Bar">
      <input type="file" name="photo" id="file">
    </form>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
      $('#file').on('change', function () {
        let formData = new FormData();
        formData.append('name', 'Friends Bar');
        formData.append('description', 'Melhor Bar');
        formData.append('photo', $('#file')[0].files[0]);
        let headers = {
          'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjA1NWY5MzI2N2JiZTZmYzJiMjdhZDI4NmExZTBkMDRkYTJjMDJkZTJmZTI5MGU0YzM0NjdiZTJlNjE0MzAwZjUzODk1NDgxMTYyYzFmNDliIn0.eyJhdWQiOiIzIiwianRpIjoiMDU1ZjkzMjY3YmJlNmZjMmIyN2FkMjg2YTFlMGQwNGRhMmMwMmRlMmZlMjkwZTRjMzQ2N2JlMmU2MTQzMDBmNTM4OTU0ODExNjJjMWY0OWIiLCJpYXQiOjE1MDMzMjc3MjksIm5iZiI6MTUwMzMyNzcyOSwiZXhwIjoxNTM0ODYzNzI5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.QSOjOSUJG-0tbjQj3Zo8ioAmvnEjfd7Rb7N0n3bcoO67cct3IUYnq9sDKbdHGDB9gCQLUCvXjMjqpdZEepygQKfj_w7cV5oHS1Nf_lEM0tFA4umU11PkTlJGptDO8dQR_LUuzoL5bSA9DjzbzDe4-MZgfhXFqP5WJXQyelEIOa20FodxMsKf_1YLfHcX9OX-XyHUYqlgoI3lOqSrDDTkU4P4-RJEO8AK3apK8ZLhOO89Uz5pYNx0dRa5f5aHbhk4pHrRsJCgwVukSsfsK1rBvGGeBPXcJUxYcq9RQpdObnFCnA3yZfFCNUK4IQoP7NpKmVkp-936TUvimPpnMeIOCH9ir7aobdWSwSkYjq-9TrLBa1kBmBqv0_2up2J_IU1BcWo-m1KQQ1X1_rD2iTxtzL26Cdsq40BVjn1wrnn_88cE8MAcTgFvPXZlITQZ7-lMkfeNbew0XDZ__QQf1E0EAo59_vmGyk9Lv09dKU-L1XfZt0COLGGJy_bRgX-g3T8JcUi6hbfREAWHxQzS8SSoaRF79wCQJmIeGh51juDZ8-nuDHMxsU_9Aww8NT40CEq6_a8ACkIs3kOwow3JpIcReVI5bGsuheNPsh4sCIrO-NKvWUbd8NXqPkV62g-MutJue4OIBhY969ruXX3S5sVm56uifbT4lRGQkNQPrfmldws',
          //'content-type': 'multipart/form-data'
          'content-type': 'application/x-www-form-urlencoded'
        }
        axios.post('http://localhost:8000/api/v1/restaurants/2', formData, {headers: headers})
      })
    </script>
  </body>
</html>
