<?php /*
 * Kimkëlen - School Management Software
 * Copyright (C) 2013 CeSPI - UNLP <desarrollo@cespi.unlp.edu.ar>
 *
 * This file is part of Kimkëlen.
 *
 * Kimkëlen is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License v2.0 as published by
 * the Free Software Foundation.
 *
 * Kimkëlen is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Kimkëlen.  If not, see <http://www.gnu.org/licenses/gpl-2.0.html>.
 */ ?>
<?php use_helper('Date') ?>

<?php if ($object->is_empty()): ?>

    <div class="notice" style="padding: 20px; background-image: none; margin-bottom: 15px;">
        <?php echo __('The student has no approved subjects') ?>
    </div>

<?php else: ?>

    <?php foreach ($object->get_years_in_career() as $year): ?>

        <table class="table gridtable_bordered">
            <thead>
                <tr>
                    <th colspan="7"><?php echo __('Year ' . $year) ?></th>
                </tr>
                <tr>
                    <th rowspan="2"><?php echo __("Condition") ?></th>
                    <th rowspan="2"><?php echo __("Fecha aprobación") ?></th>
                    <th rowspan="2"><?php echo __("Año Lectivo") ?></th>
                    <th class="text-left" rowspan="2"><?php echo __("Subject") ?></th>
                    <th colspan="2"><?php echo __("Calification") ?></th>
                    <th rowspan="2"><?php echo __("School") ?></th>
                </tr>
                <tr>
                    <th>Nro.</th>
                    <th>Letras</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($object->get_subjects_in_year($year) as $css): ?>
                    <tr>

                        <td class="text-center"><?php echo $css->getCondition() ?></td>

                        <td class="text-center"><?php echo $css->getApprovedDate() ?></td>

                        <td class="text-center"><?php echo $css->getSchoolYear() ?></td>

                        <td align="left" width="500px"><?php echo $css->getSubjectName() ?></td>

                        <td class="text-center"><?php echo $css->getMark() ?></td>

                        <td class="text-center"><?php echo $css->getMarkAsSymbol() ?></td>

                        <td class="text-center"><?php echo $css->getSchoolName() ?></td>

                    </tr>
                <?php endforeach ?>

                <tr >
                    <th colspan="5" style="text-align:left !important;"><?php echo __($object->get_str_year_status($year)) ?></th>
                    <th colspan="2"><?php echo __('Average') ?>: <?php echo ( $object->get_year_average($year) ? round($object->get_year_average($year), 2) : '-'); ?>    </th>
                </tr>

            </tbody>
        </table>

    <?php endforeach ?>

<?php endif; ?>

