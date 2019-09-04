import React from 'react'
import { Create, SimpleForm } from 'react-admin'

export default props => {
  return (
    <Create title='ra.action.create' {...props}>
      <SimpleForm />
    </Create>
  )
}
