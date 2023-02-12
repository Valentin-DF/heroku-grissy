export interface SkeletonTable {

    field?: string;
    label?: string;
    ftype?: string;
}

export interface SkeletonForm {
  field?: string;
  label?: string;
  ftype?: string;
  submitted?: boolean;
  isEdit?: boolean;
  //
  isText?: boolean;
  isTextArea?: boolean;
  isDate?: boolean;
  isNumber?: boolean;
  isPicture?: boolean;
  isCheckbox?: boolean;
  isSelect?: boolean;
  isPassword?: boolean;
  //

  rutaSelect?: string;
  fieldText?: string;
}
