<!--                STEP        -->
<div class="step mb-5">
    <!--                title-->
    <label class="fw-bold">Titre de l'étape</label>
    <span>(50 caractères max.) **</span>
    <div class="mb-3 mx-auto fw-bold w-75">
        <input maxlength="50" type="text" name="stepTitle[]" class="form-control">
    </div>
    <!--                description-->
    <span>Décrivez l'étape</span>
    <span class="fst-italic">(255 caractères max.)</span>
    <textarea maxlength="255" name="stepDescription[]" class="form-control mb-3 mx-auto w-75"
              rows="3"></textarea>
    <!--                tool & matter-->
    <div class="row row-cols-2 w-75 mx-auto">
        <div>
            <label>Outil</label>
            <span>(20 caractères max.)</span>
            <div class="mb-3">
                <input maxlength="20" type="text" name="stepTool[]" class="form-control">
            </div>
        </div>
        <div>
            <label>Matière</label>
            <span>(20 caractères max.)</span>
            <div class="mb-3 fw-bold">
                <input maxlength="20" type="text" name="stepMatter[]" class="form-control">
            </div>
        </div>
    </div>
    <!--                illustration-->
    <div>
        <label>Choisissez une image</label>
        <input type="file" name="stepImage[]" accept=".jpeg, .jpg, .png">
    </div>
</div>
