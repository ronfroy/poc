import React from 'react'
import { List, Datagrid, TextField, EditButton } from 'react-admin'

export default function (props) {
  return (
    <List {...props}>
      <Datagrid>
        <TextField source='originId' label='Id' />
        <TextField source='name' label='Name' />
        <EditButton />
      </Datagrid>
    </List>
  )
}
