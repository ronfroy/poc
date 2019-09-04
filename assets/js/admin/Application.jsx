import React from 'react'
import { Admin, Resource } from 'react-admin'
import QuestionList from './QuestionList'
import QuestionEdit from './QuestionEdit'
import QuestionCreate from './QuestionCreate'

export default props => {
  return (
    <Admin {...props}>
      <Resource name='questions' list={QuestionList} edit={QuestionEdit} create={QuestionCreate} />
    </Admin>
  )
}
