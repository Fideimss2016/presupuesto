<?php
include "valida_seguridad.php";

echo "<frameset rows=\"168,*\" cols=\"*\" frameborder=\"NO\" border=\"0\" framespacing=\"0\">";
echo "  <frame src=\"top.html\" name=\"topFrame\" scrolling=\"NO\" noresize title=\"topFrame\">";
echo "  <frameset cols=\"210,*\" frameborder=\"NO\" border=\"0\" framespacing=\"0\">";
echo "    <frame src=\"left.php\" name=\"leftFrame\" scrolling=\"NO\" noresize title=\"leftFrame\">";
echo "    <frame src=\"main.html\" name=\"mainFrame\" title=\"mainFrame\">";
echo "  </frameset>";
echo "</frameset>";
echo "<noframes><body>";
echo "</body></noframes>";
echo "</html>";
?>