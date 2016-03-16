<?php
    /**
     * Created by PhpStorm.
     * User: Ange KOUAKOU
     * Date: 22-Oct-15
     * Time: 3:41 PM
     */

    if (isset($_POST['code'])) {
        $code = $_POST['code'];

        $sql = "SELECT * FROM employes WHERE code_emp = '" . $code . "'";
        $res = mysqli_query($connexion, $sql) or exit(mysqli_error($connexion));
        while ($data = mysqli_fetch_array($res)) :?>

            <!--suppress ALL -->
            <div class="col-md-9" style="margin-left: 12.66%">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Modification Employe
                        <a href='form_principale.php?page=form_actions&source=employes&action=modifier' type='button' class='close' data-dismiss='alert' aria-label='Close' style='position: inherit'>
                            <span aria-hidden='true'>&times;</span>
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="jumbotron"
                             style="width: 70%; padding: 30px 30px 20px 30px; background-color: rgba(1, 139, 178, 0.1); margin-left: auto; margin-right: auto">
                            <p style="color: grey; font-size: small">Les champs precedes de "*" sont imperatifs, veuillez donc les renseigner.</p>
                        </div>
                        <form action="form_principale.php?page=employes/maj_employes" method="POST">
                            <input type="hidden" name="code_emp" value="<?php echo $data['code_emp']; ?>">
                            <input type="hidden" name="action" value="maj">
                            <table class="formulaire"
                                   style="width= 100%; margin-left: auto; margin-right: auto"
                                   border="0">
                                <tr>
                                    <td class="champlabel">*Titre :</td>
                                    <td>
                                        <label>
                                            <select name="titre_emp" class="form-control" required>
                                                <option disabled></option>
                                                <?php
                                                $req = "SELECT DISTINCT titre_emp FROM employes ORDER BY titre_emp ASC ";
                                                $result = mysqli_query($connexion, $req);
                                                while ($data_grp = mysqli_fetch_array($result)) {
                                                    if ($data['titre_emp'] == $data_grp['titre_emp']) {
                                                        echo '<option value="' . $data_grp['titre_emp'] . '" selected >' . $data_grp['titre_emp'] . '</option>';
                                                    } else {
                                                        echo '<option value="' . $data_grp['titre_emp'] . '" >' . $data_grp['titre_emp'] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="champlabel">*Nom :</td>
                                    <td>
                                        <label>
                                            <input type="text" name="nom_emp" required class="form-control" onblur="this.value = this.value.toUpperCase();"
                                                   value="<?php echo $data['nom_emp']; ?>"/>
                                        </label>
                                    </td>
                                    <td class="champlabel">Prenoms :</td>
                                    <td>
                                        <label>
                                            <input type="text" name="prenoms_emp" size="40" class="form-control" onblur="this.value = this.value.toUpperCase();"
                                                   value="<?php echo $data['prenoms_emp']; ?>"/>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="champlabel">Fonction :</td>
                                    <td>
                                        <label>
                                            <input type="text" name="fonction_emp" class="form-control" onblur="this.value = this.value.toUpperCase();"
                                                   value="<?php echo $data['fonction_emp']; ?>"/>
                                        </label>
                                    </td>
                                    <td class="champlabel">*Departement :</td>
                                    <td>
                                        <label>
                                            <select name="departement_emp" required class="form-control">
                                                <option disabled></option>
                                                <?php
                                                $req = "SELECT DISTINCT departement_emp FROM employes ORDER BY departement_emp ASC ";
                                                $result = mysqli_query($connexion, $req);
                                                while ($data_grp = mysqli_fetch_array($result)) {
                                                    if ($data['departement_emp'] == $data_grp['departement_emp']) {
                                                        echo '<option value="' . $data_grp['departement_emp'] . '" selected >' . $data_grp['departement_emp'] . '</option>';
                                                    } else {
                                                        echo '<option value="' . $data_grp['departement_emp'] . '" >' . $data_grp['departement_emp'] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="champlabel">*Email :</td>
                                    <td>
                                        <label>
                                            <input type="email" name="email_emp" size="30" required class="form-control"
                                                   value="<?php echo $data['email_emp']; ?>"/>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="champlabel">*Contact :</td>
                                    <td>
                                        <label>
                                            <input type="tel" name="tel_emp" required class="form-control"
                                                   value="<?php echo $data['tel_emp']; ?>"/>
                                        </label>
                                    </td>
                                </tr>
                            </table>
                            <br/>

                            <div style="text-align: center;">
                                <button class="btn btn-info" type="submit" name="valider" style="width: 150px">
                                    Valider
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile;
    }
?>
