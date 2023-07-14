<div class="d-flex flex-column justify-content-center">
    <div class="bg-white rounded shadow p-3 mb-4">
        <p><?= $mb['soal']; ?></p>
        <div class="d-flex flex-column gap-2">
            <div class="form-check">
                <input htmlspecialchars class="form-check-input" type="radio" id="jawabanF<?= $index; ?>_1" name="jawabanF[<?= $index; ?>]" value="1">
                <label class="form-check-label" for="jawabanF<?= $index; ?>_1"><?= $mb['jawaban_satu']; ?></label>
            </div>
            <div class="form-check">
                <input htmlspecialchars class="form-check-input" type="radio" id="jawabanF<?= $index; ?>_2" name="jawabanF[<?= $index; ?>]" value="2">
                <label class="form-check-label" for="jawabanF<?= $index; ?>_2"><?= $mb['jawaban_dua']; ?></label>
            </div>
            <div class="form-check">
                <input htmlspecialchars class="form-check-input" type="radio" id="jawabanF<?= $index; ?>_3" name="jawabanF[<?= $index; ?>]" value="3">
                <label class="form-check-label" for="jawabanF<?= $index; ?>_3"><?= $mb['jawaban_tiga']; ?></label>
            </div>
            <div class="form-check">
                <input htmlspecialchars class="form-check-input" type="radio" id="jawabanF<?= $index; ?>_4" name="jawabanF[<?= $index; ?>]" value="4">
                <label class="form-check-label" for="jawabanF<?= $index; ?>_4"><?= $mb['jawaban_empat']; ?></label>
            </div>
            <div class="form-check">
                <input htmlspecialchars class="form-check-input" type="radio" id="jawabanF<?= $index; ?>_5" name="jawabanF[<?= $index; ?>]" value="5">
                <label class="form-check-label" for="jawabanF<?= $index; ?>_5"><?= $mb['jawaban_lima']; ?></label>
            </div>
        </div>
    </div>
</div>