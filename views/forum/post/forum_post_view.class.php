<?php
class ForumPostView{
    public function display($post){
        ?>
        <div>
            <table>
                <thead><th>Username</th><th>Date of post</th></thead>
                <tbody>
                    <tr><td>Image</td><td>Content<td></tr>
                </tbody>
            </table>
        </div>
<?php
    }
}