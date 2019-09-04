import React from 'react'
import { render } from 'react-dom'
import { fetchHydra, hydraClient } from '@api-platform/admin'
import parseHydraDocumentation from '@api-platform/api-doc-parser/lib/hydra/parseHydraDocumentation'
import Application from './Application'

const dataProvider = api => hydraClient(api, fetchHydra)

parseHydraDocumentation(window.config.apiEntryPoint).then(({ api }) => {
  render(
    <Application api={api} apiDocumentationParser={parseHydraDocumentation} dataProvider={dataProvider(api)} />,
    document.getElementById('app')
  )
})
