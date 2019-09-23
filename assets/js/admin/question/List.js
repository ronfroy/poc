import React from 'react'
import { List, Datagrid, TextField, FunctionField, EditButton } from 'react-admin'

export default function (props) {
  return (
    <List {...props}>
      <Datagrid>
        <TextField label='Id' source='originId' />
        <FunctionField label="Answers" render={record => `${record.answers.length}`} />
        <TextField label='Name' source='name' />
        <EditButton />
      </Datagrid>
    </List>
  )
}
