export const BS4_INPUT_FORMAT=`<div class='form-group'>
    <label for="_NAME_">_CAPTION_</label>
    <input onchange="_FINCTION_" type="_TYPE_" class='form-control form-control-sm' name='_NAME_' id='_NAME_'>
</div>`

export const TEMPUS_DATE_TIME = `
    <div class='form-group'>
    
        <label>
            _CAPTION_
        </label>
        <div class="input-group date" id="_TIMEPICKID_" data-target-input="nearest">
            <input readonly name="_TIMEPICKID_" type="text" class="form-control datetimepicker-input" data-target="#_TIMEPICKID_"/>
            <div class="input-group-append bg-primary" data-target="#_TIMEPICKID_" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far _ICON_"></i></div>
                </div>
            </div>
            <!-- /.input group -->
        </div>
    </div
`