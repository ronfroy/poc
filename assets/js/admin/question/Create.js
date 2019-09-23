import React from 'react'
import { Create, SimpleForm, TextInput, LongTextInput, AutocompleteArrayInput, ReferenceArrayInput } from 'react-admin'

export default props => {
  return (
    <Create title='ra.action.create' {...props}>
      <SimpleForm>
        <TextInput source="name" />
        <LongTextInput source="code" />
        <ReferenceArrayInput label='Answers' source="answers" reference="answers">
          <AutocompleteArrayInput />
        </ReferenceArrayInput>
      </SimpleForm>
    </Create>
  )
}
