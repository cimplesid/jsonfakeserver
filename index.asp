<%@ Language="VBScript" %>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>login</title>
    </head>
    <body>
         <form method="Post" action="Page3.asp">
         Email <input type="email" name="email" placeholder="abc@abc.com" /><br>
               Password <input type="password" name="pass" placeholder="password" /><br>
            <input type="submit"  value="submit"/>
             </form>
    </body>
    <%
        
db_connection = "Provider=SQLOLEDB.1:Server=WEBDEL33\SQL2008R2;Database=Kavith;Pwd=Pwd4sql2008;"
set conn = server.createobject("adodb.connection")
set Cmd = server.CreateObject("ADODB.Command)
conn.open(db_connection)
set rs = server.CreateObject("ADODB.RecordSet")

    %>
    <%
          Dim name,age
email = Request.Form("email")
pass = Request.Form("pass")
 sSQL="SELECT id, email, password FROM users WHERE email="&email&",password="&pass,
var user = conn.execute(sSQL)

if(user==null)
Response.Write("<script>alert('login failed')</script>");
else
Response.Write("<script>alert('sucessfully logged in')</script>");

      %>
</html>
