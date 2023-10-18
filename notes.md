

GENERATE MIGRATIONS N MODELS
1. create Survey model -mcrR
// it creates SurveyModel, migrations : create_surveys_table, 2 SurveyRequest files,
  SurveyController


SURVEY FORM
1. create SurveyController --api
> find survey by user_id
> sort by created_at
2. create make:resource SurveyResource