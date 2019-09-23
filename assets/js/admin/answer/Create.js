import React from 'react'
import { Create, SimpleForm, TextInput, AutocompleteArrayInput, ReferenceArrayInput } from 'react-admin'

export default props => {
  return (
    <Create title='ra.action.create' {...props}>
      <SimpleForm>
        <TextInput source="name" />
      </SimpleForm>
    </Create>
  )
}
