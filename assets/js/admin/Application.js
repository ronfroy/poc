import React from 'react'
import { Admin, Resource } from 'react-admin'
import { QuestionList, QuestionEdit, QuestionCreate } from './question'
import { AnswerList, AnswerEdit, AnswerCreate } from './answer'

export default props => {
  return (
    <Admin {...props}>
      <Resource name='questions' list={QuestionList} edit={QuestionEdit} create={QuestionCreate} />
      <Resource name='answers' list={AnswerList} edit={AnswerEdit} create={AnswerCreate} />
    </Admin>
  )
}
