// Component enums

export enum SearchType {
  /** Busqueda de tipo vacio/inicial */
  NONE,

  /** Busqueda de tipo codigo */
  CODE,

  /** Busqueda de tipo description */
  DESCRIPTION
}

export enum FinderSearchStatus {
  /** Error de busqueda */
  ERROR,

  /** Busqueda Satisfactorio */
  DONE,

  /** Pendiente de resultados de busqueda */
  LOADING,
}
