<form action="{{ route('test-file-upload') }}" method="post" name="frmUpload" enctype="multipart/form-data">
@csrf
<tr>
  <td>Upload</td>
  <td align="center">:</td>
  <td><input name="wr_file" type="file" id="file"/></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td align="center">&nbsp;</td>
  <td><input name="btnUpload" type="submit" value="Upload" /></td>
</tr>
</form>