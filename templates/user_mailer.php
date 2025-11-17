<form name=step1frm action=user_mailer.php?act=mailer method=post>
<table width=100%  cellspacing=0 cellpadding=0  align=center>
  <tr><td class=tblrow><b>E-mail Member Database</b></td></tr>
  <tr><td class=tblrow></td></tr>

 <tr>
   <td class=tdimage1 colspan=4 align=center>&nbsp;&nbsp;&nbsp;</td>
    <tr><td>
      <table width=100% border=0 cellspacing=0 cellpadding=0>

	       <tr><td align=center colspan=3 ><span style=color:red></span><br></td></tr>

        <tr><td height=10>&nbsp;&nbsp;</td></tr>
        
        <tr class = listtableoddrow>
           <td colspan=0  align=left width=4%>&nbsp;&nbsp;</td>
           <td colspan=0  align=left class=textbld width=25%><b>Status</b></td>
           <td align=left width=77%>
            <select name='user_status' class='select100'>
	          <option value=all SELECTED {$sel_all}>All</option>
	          <option value=L            {$sel_active}>Active</option>
	          <option value=W            {$sel_wait}>UN-CONFIRMED</option>
            </select>
           </td>
        </tr>
        <tr><td height=10>&nbsp;&nbsp;</td></tr>

        <tr class = listtableoddrow>
           <td colspan=0  align=left width=4%>&nbsp;&nbsp;</td>
           <td align=left class=textbld><b>Message type</b></td>
           <td align=left >
             <select name='mail_type' class='select100'>
               <option value=plain SELECTED {$sel_plain}>Plain Text</option>
               <option value=html           {$sel_html}>HTML Text</option>
             </select>
           </td>
        </tr>
        <tr><td height=10>&nbsp;&nbsp;</td></tr>

		<tr  class = listtableoddrow>
           <td colspan=0  align=left width=4%>&nbsp;&nbsp;</td>
		   <td align=left class=textbld><b>Title</b></td>
		   <td><input type=text name='title' value='' class='Textbox' size=34></td>
	    </tr>
        <tr><td height=10>&nbsp;&nbsp;</td></tr>
		<tr  class = listtableoddrow>
           <td colspan=0  align=left width=4%>&nbsp;&nbsp;</td>
		   <td align=left class=textbld><b>Description</b></td>
		   <td>
             <div align=left>
               <textarea wrap=virtual rows=15 cols=60 name=description class='TEXTAREA'>{$description}</textarea><br>
             </div>
           </td>
	    </tr>
        <tr><td height=10>&nbsp;&nbsp;</td></tr>
        <tr><td height=10 colspan=3 class='text'>Substitutions (Message Body / Title field):</td></tr>
        <tr><td height=10 width=30% class='text'> {USERID}   </td><td width=2%>:</td><td width=40% class='text'>User's ID</td></tr>
        <tr><td height=10 width=30% class='text'> {FIRSTNAME} </td><td width=2%>:</td><td width=40%  class='text'>User's firstname</td></tr>
        <tr><td height=10 width=30% class='text'> {LASTNAME} </td><td width=2%>:</td><td width=40%  class='text'>User's lastname</td></tr>
        <tr><td height=10 width=30% class='text'> {EMAIL}   </td><td width=2%>:</td><td width=40% class='text'>User's email</td></tr>
        <tr><td height=10 width=30% class='text'> {PASSWORD}   </td><td width=2%>:</td><td width=40% class='text'>User's password</td></tr>
        <tr><td height=10 class='text'> {BASEURL}  </td><td width=2%>:</td><td width=40% class='text'>{$base_url}</td></tr>
        <tr><td height=10 class='text'> {SITETITLE} </td><td width=2%>:</td><td width=40% class='text'>{$global_site_title}</td></tr>
        <tr><td height=10>&nbsp;&nbsp;</td></tr>
        <tr><td height=10>&nbsp;&nbsp;</td></tr>
       <tr>
         <td colspan=0  align=left width=4%>&nbsp;&nbsp;</td>
         <td  align=center colspan=2 width=94% >
           <input type=submit name=f_submit value=Send class='btn' onmouseover=this.className='btnhov' >
           <input type=hidden name=act   value='update'>
           <input type=hidden name=mode  value='1'>
         </td>
       </tr>
        <tr><td height=10>&nbsp;&nbsp;</td></tr>
       
    </table>
   </td>
  </tr>
 </table>
</form>