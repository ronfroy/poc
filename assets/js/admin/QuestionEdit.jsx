import React from 'react'
import { Edit, SimpleForm } from 'react-admin'

export default props => {
  return (
    <Edit title='ra.action.create' {...props}>
      <SimpleForm />
    </Edit>
  )
}
