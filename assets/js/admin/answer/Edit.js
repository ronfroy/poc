import React from 'react'
import { Edit, SimpleForm, TextInput, AutocompleteArrayInput, ReferenceArrayInput } from 'react-admin'

export default props => {
  return (
    <Edit title='ra.action.create' {...props}>
      <SimpleForm>
        <TextInput source="name" />
      </SimpleForm>
    </Edit>
  )
}
