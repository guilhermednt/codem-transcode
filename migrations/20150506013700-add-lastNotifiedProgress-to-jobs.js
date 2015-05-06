module.exports = {
  up: function(migration, DataTypes, done) {
    // add altering commands here
    migration.addColumn('Jobs', 'lastNotifiedProgress', { type: Sequelize.FLOAT, defaultValue: 0.0 }).complete(done);
  },
  down: function(migration, DataTypes, done) {
    // add reverting commands here
    migration.removeColumn('Jobs', 'lastNotifiedProgress').complete(done);
  }
}
